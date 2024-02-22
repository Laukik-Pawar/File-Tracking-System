const canvas = document.getElementById("imageCanvas");
        const context = canvas.getContext("2d");
        const colorPicker = document.getElementById("colorPicker");
        const brushSize = document.getElementById("brushSize");
        
        const img = new Image();
        img.src = "data:<?php echo $imageType; ?>;base64,<?php echo base64_encode($imageData['attachment']); ?>";
        img.onload = function () {
            context.drawImage(img, 0, 0, canvas.width, canvas.height);
        }

        let isDrawing = false;
        let lastX = 0;
        let lastY = 0;

        canvas.addEventListener("mousedown", (e) => {
            isDrawing = true;
            [lastX, lastY] = [e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top];
        });

        canvas.addEventListener("mousemove", draw);

        canvas.addEventListener("mouseup", () => {
            isDrawing = false;
            [lastX, lastY] = [0, 0];
        });

        canvas.addEventListener("mouseout", () => (isDrawing = false));

        function draw(e) {
            if (!isDrawing) return;

            context.beginPath();
            context.moveTo(lastX, lastY);
            context.lineTo(e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top);
            context.strokeStyle = colorPicker.value;
            context.lineWidth = brushSize.value;
            context.lineCap = "round";
            context.stroke();

            [lastX, lastY] = [e.clientX - canvas.getBoundingClientRect().left, e.clientY - canvas.getBoundingClientRect().top];
        }

//////////////////
      

        const downloadButton = document.getElementById("downloadButton");

        downloadButton.addEventListener("click", () => {
            const downloadLink = document.createElement("a");
            const annotatedImageData = canvas.toDataURL("image/jpeg");
            downloadLink.href = annotatedImageData;
            downloadLink.download = "annotated_image.jpg";
            downloadLink.click();
        });

        // Add this function to reset the annotations
function resetAnnotations() {
    // Clear the canvas
    context.clearRect(0, 0, canvas.width, canvas.height);
    
    // You can also re-draw the original image if needed
    img.onload(); // This will redraw the image on the canvas
}
const resetAnnotationsButton = document.getElementById("resetAnnotationsButton");

resetAnnotationsButton.addEventListener("click", () => {
    resetAnnotations();
});
