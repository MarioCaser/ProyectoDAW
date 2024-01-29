<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BinanceController extends Controller
{
    public function obtenerSaldo()
    {
        $apiKey = 'dNxsZ5r3R9yJudQkGsQXRufd8teAW7xvLsNJwBYTOmBNEBmwW9B4WwPJ0cLr2l0w';
        $apiSecret = 'jbqylpFXUCh9gQUoQijXCJV2vJ57uKiwCPk7s8RVanSDDxZrszmQjedpbeJiG8uh';

        $client = new Client();

        $timestamp = time() * 1000;

        $queryString = http_build_query([
            'timestamp' => $timestamp,
            'recvWindow' => 5000,
        ]);

        $signature = hash_hmac('sha256', $queryString, $apiSecret);
        
        try {
            $response = $client->get('https://testnet.binance.vision/api/v3/account', [
                'headers' => [
                    'X-MBX-APIKEY' => $apiKey,
                ],
                'query' => [
                    'timestamp' => $timestamp,
                    'signature' => $signature,
                    'recvWindow' => 5000,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getTradingPairsWeb()
    {
        $client = new Client();

        try {
            $response = $client->get('https://api.binance.com/api/v3/exchangeInfo');

            $data = json_decode($response->getBody(), true);

            $symbols = $data['symbols'];
            $tradingPairs = [];

            foreach ($symbols as $symbol) {
                $baseAsset = $symbol['baseAsset'];
                $quoteAsset = $symbol['quoteAsset'];
                $tradingPairs[] = "{$baseAsset}{$quoteAsset}";
            }

            return response()->json($tradingPairs);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function obtenerTransacciones()
    {
        $apiKey = 'dNxsZ5r3R9yJudQkGsQXRufd8teAW7xvLsNJwBYTOmBNEBmwW9B4WwPJ0cLr2l0w';
        $apiSecret = 'jbqylpFXUCh9gQUoQijXCJV2vJ57uKiwCPk7s8RVanSDDxZrszmQjedpbeJiG8uh';

        $client = new Client();

        $timestamp = time() * 1000;

        // Obtén la lista de todos los pares de trading disponibles en Binance Testnet
        $pares = $this->obtenerParesDisponibles($client);

        $transaccionesTotales = [];

        foreach ($pares as $par) {
            $symbol = $par['symbol'];

            // Realiza una solicitud para obtener las transacciones de cada par
            $transacciones = $this->obtenerTransaccionesPorPar($client, $apiKey, $apiSecret, $symbol, $timestamp);

            // Agrega las transacciones a la lista total
            $transaccionesTotales[$symbol] = $transacciones;
        }

        return response()->json($transaccionesTotales);
    }

    private function obtenerParesDisponibles($client)
    {
        // Realiza una solicitud GET para obtener la lista de pares de trading disponibles
        $response = $client->get('https://testnet.binance.vision/api/v3/exchangeInfo');
        $data = json_decode($response->getBody(), true);

        return $data['symbols'];
    }

    private function obtenerTransaccionesPorPar($client, $apiKey, $apiSecret, $symbol, $timestamp)
    {
        $queryString = http_build_query([
            'symbol' => $symbol,
            'timestamp' => $timestamp,
            'recvWindow' => 50000,
        ]);

        $signature = hash_hmac('sha256', $queryString, $apiSecret);

        // Realiza una solicitud GET para obtener las transacciones del par especificado
        $response = $client->get('https://testnet.binance.vision/api/v3/myTrades', [
            'headers' => [
                'X-MBX-APIKEY' => $apiKey,
            ],
            'query' => [
                'symbol' => $symbol,
                'timestamp' => $timestamp,
                'signature' => $signature,
                'recvWindow' => 50000,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
    function obtenerDetallesDeMonedas(){
        $client = new Client();

        try {
            // Realiza una solicitud GET para obtener la información de todos los pares
            $response = $client->get('https://api.binance.com/api/v3/exchangeInfo');
            $data = json_decode($response->getBody(), true);

            $detallesMonedas = [];

            // Itera a través de los pares y extrae los detalles relevantes
            foreach ($data['symbols'] as $symbolData) {
                $symbol = $symbolData['symbol'];

                foreach ($symbolData['filters'] as $filter) {
                    if ($filter['filterType'] === 'LOT_SIZE') {
                        $minQty = $filter['minQty'];
                        $maxQty = $filter['maxQty'];
                    } elseif ($filter['filterType'] === 'MARKET_LOT_SIZE') {
                        $maxMarketQty = $filter['maxQty'];
                    } elseif ($filter['filterType'] === 'NOTIONAL') {
                        $minNotional = $filter['minNotional'];
                        $maxNotional = $filter['maxNotional'];
                    }
                }

                // Almacena los detalles en un arreglo asociativo
                $detallesMonedas[$symbol] = [
                    'minQty' => $minQty,
                    'maxQty' => $maxQty,
                    'maxMarketQty' => $maxMarketQty,
                    'minNotional' => $minNotional,
                    'maxNotional' => $maxNotional,
                ];
            }

            $simbolosMonedas = array_keys($detallesMonedas);

            // Ordenar las claves alfabéticamente
            sort($simbolosMonedas);

            // Crear un nuevo array asociativo ordenado
            $datosMonedasOrdenados = [];
            foreach ($simbolosMonedas as $simbolo) {
                $datosMonedasOrdenados[$simbolo] = $detallesMonedas[$simbolo];
            }

            $export = var_export($datosMonedasOrdenados,true);
            return '<pre>' . $export . '</pre>';
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}