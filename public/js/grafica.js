console.log(criptoArray);
let symbol = from2;
const currency = criptoArray.find(currency => currency[2] === symbol);
let currencyName = "bitcoin";
if (currency) {
	currencyName = currency[1].toLowerCase();
}
else currencyName = "bitcoin";

let enlaceConsultaPrecio = 'https://api.coingecko.com/api/v3/coins/' + currencyName + '/market_chart?vs_currency=USD&days=1';


fetch(enlaceConsultaPrecio)
	.then(response => response.json())
	.then(data => {
		//console.log(data.prices);
		let prices = [];
		let dates = [];
		for(let i=0;i<data.prices.length;i++) {
			prices[prices.length] = data.prices[i][1];
			dates[dates.length] = data.prices[i][0];
		}

		const canvas = document.getElementById("canvas");
		const context = canvas.getContext("2d");
		const margin = 50;
		const height = canvas.height - 2 * margin;
		const width = canvas.width - 2 * margin;
		const maxPrice = Math.max(...prices);
		const minPrice = Math.min(...prices);

		let lastX = null;
		let lastY = null;

		function draw() {
			context.clearRect(0, 0, canvas.width, canvas.height);

			// Draw X and Y axis
			context.beginPath();
			context.moveTo(margin, margin);
			context.lineTo(margin, canvas.height - margin);
			context.lineTo(canvas.width - margin, canvas.height - margin);
			context.stroke();

			// Draw Y axis labels
			context.textAlign = "right";
			context.textBaseline = "middle";
			for (let i = 5; i >= 0; i--) {
			const price = Math.round(((5 - i) * minPrice + i * maxPrice) / 5);
			const y = margin + (5 - i) * height / 5;
			context.font = "bold 15px Arial";
			context.fillText("$" + price, margin - 10, y);
			context.beginPath();
			context.moveTo(margin - 5, y);
			context.lineTo(margin, y);
			context.strokeStyle = "orange";
			context.lineWidth = 2;
			context.stroke();
			}


			// Draw X axis labels
			context.textAlign = "center";
			context.textBaseline = "top";
			// for (let i = 0; i < dates.length; i=i+57) {
			//     const x = margin + i * width / (dates.length - 1);
			//     context.fillText(dates[i], x, canvas.height - margin + 10);
			//     context.beginPath();
			//     context.moveTo(x, canvas.height - margin + 5);
			//     context.lineTo(x, canvas.height - margin);
			//     context.stroke();
			// }

			// Draw price chart
			context.beginPath();
			// context.font = "bold 15px Arial";
			context.moveTo(margin, canvas.height - margin - (prices[0] - minPrice) * height / (maxPrice - minPrice));
			for (let i = 1; i < prices.length; i++) {
				const x = margin + i * width / (prices.length - 1);
				const y = canvas.height - margin - (prices[i] - minPrice) * height / (maxPrice - minPrice);
				context.lineTo(x, y);
			}
			context.stroke();

			// Show price on mouse position
			canvas.addEventListener("mousemove", (event) => {
				context.beginPath();

				const x = event.offsetX;
				const y = event.offsetY;
				context.clearRect(canvas.width - 150, 0, canvas.width, 30);
				const index = Math.round((x - margin) / (width / (prices.length - 1)));
				const price = prices[index];
				// console.log(price);
				// document.getElementById("precioPrueba").innerHTML = price;
				context.save(); // Save the current context state
				if(price != undefined){
					context.fillText(price.toFixed(2), canvas.width - 80, 10);
				}
				
				context.restore(); // Restore the previous context state
			});



			canvas.addEventListener("mouseout", () => {
				context.clearRect(canvas.width - 150, 0, canvas.width, 30);
			  });
			  

		}
		draw();

		canvas.addEventListener("mousemove", (event) => {
			const x = event.offsetX;
			const y = event.offsetY;

			// Find the closest point to the mouse
			let closestIndex = 0;
			let closestDistance = null;
			for (let i = 0; i < prices.length; i++) {
				const px = margin + i * width / (prices.length - 1);
				// const py = canvas.height - margin - (prices[i] - minPrice) * height / (maxPrice - minPrice);
				// const distance = Math.sqrt(Math.pow(px - x, 2) + Math.pow(py - y, 2));
				let distance = px - x;
				if( distance < 0)
					distance = distance * (-1);
				if (closestDistance == null || distance < closestDistance) {
				closestIndex = i;
				closestDistance = distance;
				}
			}

			function drawLine(x, color) {
				context.beginPath();
				context.strokeStyle = color;
				context.moveTo(x, margin);
				context.lineTo(x, canvas.height - margin);
				context.stroke();
			}
			

			// Draw the vertical line at the closest point
			const px = margin + closestIndex * width / (prices.length - 1);
			const py = canvas.height - margin - (prices[closestIndex] - minPrice) * height / (maxPrice - minPrice);
			if (lastX == null || lastX != px) {
				context.clearRect(0, 0, canvas.width, canvas.height);
				draw(); //cambiar esta funcion por drawLine
				context.beginPath();
				context.moveTo(px, margin);
				context.lineTo(px, canvas.height - margin);
				context.strokeStyle = 'rgba(128, 128, 128, 0.5)';
				context.lineWidth = 2;
				context.stroke();
				lastX = px;
				lastY = py;

				// Draw the circle at the point of interest
				context.beginPath();
				// context.arc(px, py, 5, 0, 2 * Math.PI);
				// context.fillStyle = "rgba(128,128,128,0.5)";
				// context.fill();

				context.arc(px, py, 5, 0, 2 * Math.PI); // Dibuja una circunferencia vacía centrada en (x, y) con radio 5
				context.strokeStyle = "gray"; // Cambia el color del borde a gris
				context.lineWidth = 2; // Aumenta el ancho del borde a 2 píxeles
				context.stroke(); // Dibuja el borde de la circunferencia

			
				// Display the price
				context.save();
				context.fillStyle = "black";
				context.font = "bold 14px Arial";
				context.textAlign = "center";
				//context.fillText("$" + price.toFixed(2), eyeX, eyeY - 15);
				context.restore();
			}
		});
	})