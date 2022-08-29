var filter = document.getElementById('filterName');

    filter.addEventListener("click", function (event) {
        generatePNG()
    }, false);

    function generatePNG() {
        function loaded(){
        this.loaded = true;
    }
    var nWidth;
    var nHeight;
      //your code to be executed after 5 second
      let imageSources = document.getElementsByClassName("table-img");
      var objs = [];
        for (i = 0; i < imageSources.length; i++) {
            objs.push(imageSources[i]);
           // var w = document.getElementById('table-img-'+ i).getBoundingClientRect().width
            //nWidth.push(w);
           // var h = document.getElementById('table-img-'+ i).getBoundingClientRect().height
            //nHeight.push(h);
        }
        var myDiv1 = document.getElementById("myDiv1");
        var images = [];
        var nameArray = Array.prototype.slice.call(imageSources);
    
        Object.keys(nameArray).forEach(function (index) {
            var canvas = document.getElementById('canvas-'+index);
            // var cw = nWidth[index];
            // var ch = nHeight[index];
            nWidth = document.getElementById('table-img-'+ index).getBoundingClientRect().width;
            nHeight = document.getElementById('table-img-'+ index).getBoundingClientRect().height * 1.25;
            canvas.width = nWidth;
            canvas.height = nHeight;
            var ctx = canvas.getContext('2d');
            var childIndex = document.getElementById('table-img-'+ index);
            var d2 = document.implementation.createHTMLDocument();
            d2.body.appendChild(childIndex);
            ctx.direction = 'rtl';
          // const image = new Image(); // Using optional size for image
            //image.src = '/uploads/work-5.jpg';
            // image.onload = () => {
            //     ctx.drawImage(image, 0, 0, nWidth, nHeight+50);
            //     images.push(image); 
            //     ctx.drawImage(renderResult, 0, 0); 
            // };

            // Load an image of intrinsic size 300x227 in CSS pixels
            rasterizeHTML.drawDocument(d2, canvas).then(function(renderResult) {
                ctx.direction = 'rtl';
                var imgData=ctx.getImageData(0,0,canvas.width,canvas.height);
                ctx.fillStyle = "transparent"
                // var data=imgData.data;
                // for(var i=0;i<data.length;i+=4){
                //     if(data[i+3]<255){
                //         data[i]=255;
                //         data[i+1]=255;
                //         data[i+2]=255;
                //     }
                // }
                // ctx.putImageData(imgData,0,0);
            //    ctx.globalAlpha = 0.2;
            //    ctx.filter = 'blur(4px)';
             //   ctx.fillStyle = '#040D26';
                //ctx.fillRect(30, 30, nWidth - 40, nHeight - 80);
            //   ctx.fillRect(0, 30, nWidth, nHeight + 80);
               var dataUrl = canvas.toDataURL('image/jpeg', 1);
               myDiv1.innerHTML += '<a  download="triangle.jpeg" href="'+dataUrl+'" title="ImageName"><button style ="margin:10px 0px;" class="btn btn-info" type="button" id="download-'+ index+'">دانلود</button><img src="'+dataUrl+'"/> </a></br>';
               if(images[10].loaded){  
               }
               ctx.drawImage(renderResult.image, 0, 0); 
            });
   
        });

}