const qrcode = document.getElementById("qrcode");
const textInput = document.getElementById("text");

const qr = new QRCode(qrcode);

textInput.oninput = (e) => {
	qr.makeCode(e.target.value.trim());
};

qr.makeCode(textInput.value.trim());
