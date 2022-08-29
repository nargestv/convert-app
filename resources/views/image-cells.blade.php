<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Laravel Image Manipulation Tutorial</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rasterizehtml/1.2.2/rasterizeHTML.allinone.js"></script>
    <link href="/css/home.css" rel="stylesheet">

   <style>
        .cssPanel::after {
            opacity: 0;
            transition: opacity .25s ease;
            content: "Copied to clipboard!";
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            left: 0;
            color: #fff;
            font-size: 24px;
            font-weight: 600;
            background: rgba(210,78,145,.8);
            z-index: 5;
            margin-bottom: 20px
        }
        .glass-initial {
            background: rgba( 85, 2, 184, 0.25 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 4px );
            -webkit-backdrop-filter: blur( 4px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );
        }
    </style>
    <script>
        setTimeout(function() {
            const ctx = document.querySelector('canvas').getContext('2d');
            var el = document.getElementById( 'target' );
            const html = el.outerHTML;
            render_html_to_canvas(html, ctx, 0, 0, 300, 150);


            function render_html_to_canvas(html, ctx, x, y, width, height) {
            var data = "data:image/svg+xml;charset=utf-8," + '<svg xmlns="http://www.w3.org/2000/svg" width="' + width + '" height="' + height + '">' +
                '<foreignObject width="100%" height="100%">' +
                html_to_xml(html) +
                '</foreignObject>' +
                '</svg>';

            var img = new Image();
            img.onload = function() {
                ctx.drawImage(img, x, y);
            }
            img.src = data;

            }
            function html_to_xml(html) {
            var doc = document.implementation.createHTMLDocument('');
            doc.write(html);

            // You must manually set the xmlns if you intend to immediately serialize     
            // the HTML document to a string as opposed to appending it to a
            // <foreignObject> in the DOM
            doc.documentElement.setAttribute('xmlns', doc.documentElement.namespaceURI);

            // Get well-formed markup
            html = (new XMLSerializer).serializeToString(doc.body);
            return html;
            }
}, 1000);
setTimeout(function() {
      //your code to be executed after 1 second
        const canvas = document.getElementById('canvas-data');
  const mediumQuality = canvas.toDataURL('image/jpeg', 0.5);
        console.log(mediumQuality);
}, 2000);
    </script>
</head>
<body>
    <div class="container mt-4" style="max-width: 600px">
        <h2 class="mb-5">لیست قیمت</h2>
        <form action="{{route('image.import')}}" enctype="multipart/form-data" method="post">
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
            <div class="col-md-12 mb-3 text-center">
                <strong>Manipulated image:</strong><br />
                <img src="/uploads/{{ Session::get('fileName') }}" width="600px"/>
            </div>
            @endif
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="mb-3 ">
            <canvas  id="canvas-data" width="300" height="300">
            An alternative text describing what your canvas displays.
            </canvas>
            <div id="target">
                @foreach ($files as $file_detail)
                <div class="cssPanel glass-initial">
                <table class="table ">
                    <thead>
                        <tr>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($file_detail as $files)
                        <tr>
                            @foreach ($files as $file)
                            <td>{{ $file }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                @endforeach
                </div>
            </div>
            
        </form>
        
    </div>
</body>


</html>
