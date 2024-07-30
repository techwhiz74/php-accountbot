<?php
    session_start(); 
	include("./system/config.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website with Login & Registration Form</title>
   <!-- menunavbar -->
     <link rel="stylesheet" href="assets/explore.css" /> 
     <link rel="stylesheet" href="assets/nav.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    
    <link
    href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
    rel="stylesheet"
  />
  </head>
  <body>
  



  <div class="explore-text">★ᯓ Explore ᯓ★</div>
 
  <main>
		<header>
			<ul class="indicator">
				<li data-filter="all" class="active"><a href="#">All Products</a></li>
				<li data-filter="Streaming"><a href="#">Streaming 📺</a></li>
				<li data-filter="vpn"><a href="#">Vpn 🌐</a></li>
				<li data-filter="Music"><a href="#">Music 🎧</a></li>
				<li data-filter="Adult"><a href="#">Adult 🔞</a></li>
				<li data-filter="Sport"><a href="#">Sport 🥇</a></li>
			</ul>
			
		</header>
		<div class="product-field">
			<ul class="items">
				<li data-category="" data-price="">
					<picture>
					<img src="images/netflix.png" alt="">
					</picture>
					<div class="detail">
					<h1 class="product-detail">Netflix</h1>
						<strong>Streaming</strong>
					<a href="buy/Netflix.php"><small>Starting at $2.99</small></a>
					</div>
					
				</li>
				<li data-category="" data-price="">
					<picture>
					<img src="images/disney.png" alt="">
					</picture>
					<div class="detail">
					<h1 class="product-detail">Netflix</h1>
						<strong>Blazer</strong>
						<small>Buy now</small>
					</div>

				</li>
				<li data-category="" data-price="">
					<picture>
						<img src="image/wa2.png" alt="">
					</picture>
					<div class="detail">
					<h1 class="product-detail">Netflix</h1>
						<strong>Watch</strong>
						<small>Buy now</small>
					</div>

				</li>
				<li data-category="" data-price="">
					<picture>
						<img src="image/bz2.png" alt="">
					</picture>
					<div class="detail">
					<h1 class="product-detail">Netflix</h1>
						<strong>Blazer</strong>
						<small>Buy now</small>
					</div>
			
				</li>
				<li data-category="" data-price="">
					<picture>
						<img src="image/wa3.png" alt="">
					</picture>
					<div class="detail">
					<h1 class="product-detail">Netflix</h1>
						<strong>Watch</strong>
						<small>Buy now</small>
					</div>

				</li>
				<li data-category="" data-price="">
					<picture>
						<img src="image/bz4.png" alt="">
					</picture>
					<div class="detail">
						<strong>Blazer</strong>
						<h1 class="product-detail">Netflix</h1>
						<small>Buy now</small>
					</div>

				</li>
				<li data-category="" data-price="">
					<picture>
						<img src="image/so.png" alt="">
					</picture>
					<div class="detail">
					<h1 class="product-detail">Netflix</h1>
						<strong>Shoes</strong>
						<small>Buy now</small>
					</div>

				</li>
				<li data-category="" data-price="">
					<picture>
						<img src="image/samsung.png" alt="">
					</picture>
					<div class="detail">
					<h1 class="product-detail">Netflix</h1>
						<strong>Mobile</strong>
						<small>Buy now</small>
					</div>

				</li>
				<li data-category="" data-price="">
					<picture>
						<img src="image/so1.png" alt="">
					</picture>
					<div class="detail">
					<h1 class="product-detail">Netflix</h1>
						<strong>Shoes</strong>
						<small>Buy now</small>
					</div>

				</li>
				<li data-category="" data-price="">
					<picture>
						<img src="image/so2.png" alt="">
					</picture>
					<div class="detail">
					<h1 class="product-detail">Netflix</h1>
						<strong>Shoes</strong>
						<small>Buy now</small>
					</div>

				</li>
				<li data-category="" data-price="">
					<picture>
						<img src="image/one.png" alt="">
					</picture>
					<div class="detail">
					<h1 class="product-detail">Netflix</h1>
						<strong>Mobile</strong>
						<small>Buy now</small>
					</div>

				</li>
				<li data-category="" data-price="">
					<picture>
						<img src="image/so3.png" alt="">
					</picture>
					<div class="detail">
					<h1 class="product-detail">Netflix</h1>
						<strong>Shoes</strong>
						<small>Buy now</small>
					</div>

				</li>
			</ul>
		</div>
	</main>

	  <!-- menu inc -->
	<?php require_once 'menu.php'; ?>


	<script>
	(function() {
		
		let field = document.querySelector('.items');
		let li = Array.from(field.children);

		function FilterProduct() {
			for(let i of li){
				const name = i.querySelector('strong');
				const x = name.textContent;
				i.setAttribute("data-category", x);
			}

			let indicator = document.querySelector('.indicator').children;

			this.run = function() {
				for(let i=0; i<indicator.length; i++)
				{
					indicator[i].onclick = function () {
						for(let x=0; x<indicator.length; x++)
						{
							indicator[x].classList.remove('active');
						}
						this.classList.add('active');
						const displayItems = this.getAttribute('data-filter');

						for(let z=0; z<li.length; z++)
						{
							li[z].style.transform = "scale(0)";
							setTimeout(()=>{
								li[z].style.display = "none";
							}, 500);

							if ((li[z].getAttribute('data-category') == displayItems) || displayItems == "all")
							 {
							 	li[z].style.transform = "scale(1)";
							 	setTimeout(()=>{
									li[z].style.display = "block";
								}, 500);
							 }
						}
					};
				}
			}
		}

		function SortProduct() {
			let select = document.getElementById('select');
			let ar = [];
			for(let i of li){
				const last = i.lastElementChild;
				const x = last.textContent.trim();
				const y = Number(x.substring(1));
				i.setAttribute("data-price", y);
				ar.push(i);
			}
			this.run = ()=>{
				addevent();
			}
			function addevent(){
				select.onchange = sortingValue;
			}
			function sortingValue(){
			
				if (this.value === 'Default') {
					while (field.firstChild) {field.removeChild(field.firstChild);}
					field.append(...ar);	
				}
				if (this.value === 'LowToHigh') {
					SortElem(field, li, true)
				}
				if (this.value === 'HighToLow') {
					SortElem(field, li, false)
				}
			}
			function SortElem(field,li, asc){
				let  dm, sortli;
				dm = asc ? 1 : -1;
				sortli = li.sort((a, b)=>{
					const ax = a.getAttribute('data-price');
					const bx = b.getAttribute('data-price');
					return ax > bx ? (1*dm) : (-1*dm);
				});
				 while (field.firstChild) {field.removeChild(field.firstChild);}
				 field.append(...sortli);	
			}
		}

		new FilterProduct().run();
		new SortProduct().run();
	})();
	</script>
  </body>
</html>