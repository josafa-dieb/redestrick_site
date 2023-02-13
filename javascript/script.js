
setTimeout(function () {	
	if(document.title != 'Rede Strick - Loja'){
		const discord = document.getElementById("discord")
		let floatBox;
		if(window.innerWidth >= 730){
		floatBox	= `<iframe src="https://discord.com/widget?id=748041570392997918&theme=dark" width="100%" height="450" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>`		
		discord.innerHTML = floatBox;		
	}
}
}, 3*1000)
window.onload = () => {
	if(document.title != 'Rede Strick - Loja'){
		document.getElementById('discord').style.display = "block";
		document.getElementById('discord').style.position = "fixed";
		document.getElementById('discord').style.right = "40px";
		document.getElementById('discord').style.top = "100px";
		document.getElementById('discord').style.width = "40vw";
		document.getElementById('discord').style.height = "auto";
		document.getElementById('discord').style.zIndex = "-2";
		document.getElementById('discord').style.backgroundColor = "#7289da";
		document.getElementById('discord').style.borderRadius = "4px";
		document.getElementById('discord').innerHTML = `<img style="display: block;z-index: -2; position: relative; padding: 0;width: 20%; margin: 25vh auto;" src='https://i.imgur.com/j3IISku.gif'>`;
	}else{
		document.getElementById('discord').style.display = "block";
		document.getElementById('discord').style.position = "fixed";
		document.getElementById('discord').style.right = "40px";
		document.getElementById('discord').style.top = "100px";
		document.getElementById('discord').style.width = "40vw";
		document.getElementById('discord').style.height = "auto";
		document.getElementById('discord').style.zIndex = "-2";
		document.getElementById('discord').style.backgroundColor = "white";
		document.getElementById('discord').style.borderRadius = "4px";
	}

	const copyIp = document.getElementById("copy-ip");
	copyIp.innerHTML = "JOGAR.STRICKPVP.COM.BR";
	const openMenu = document.getElementById("open-menu");
	const closeMenu = document.getElementById("close");
	const menu = document.getElementById("menu");
	const ip = document.getElementById("ip");
	openMenu.addEventListener("click", () => {
		menu.style.display = "block";
	})	
	closeMenu.addEventListener("click", () => {
		menu.style.display = "none";
		
	})	
	copyIp.addEventListener("click", () => {
		ip.select();
   	ip.setSelectionRange(0, 99999);	
		document.execCommand("copy");
	})
}
function closeDropdown(){
	document.getElementById("dropdown").style.display = "none";
	document.getElementsByTagName("body")[0].style.overflowY = "auto";
}
function openDropdown(id){
	const floatbox = document.getElementById("dropdown")
	let http = new XMLHttpRequest();
	http.open("GET", "../includes/item-dropdown.php?id=" +id);
	http.send();
	http.onreadystatechange = (data) => {
		if(http.readyState == 4){
			floatbox.innerHTML = http.responseText
		}
	}
	floatbox.style.display = 'block';
	console.log(floatbox)
	if(window.innerWidth <= 729){
		window.location.href = "#dropdown";
		document.getElementsByTagName("body")[0].style.overflowY = "hidden";
		
	}
}
