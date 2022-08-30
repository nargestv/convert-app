<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Laravel Image Manipulation Tutorial</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rasterizehtml/1.2.2/rasterizeHTML.allinone.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/home.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js"></script>

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
        canvas {
            position: relative;
        }
        #stack {
            position:relative;
            }
       
    </style>
    

</head>
<body > 
       <div class="container mt-4" style="max-width: 600px">
            <input type="button" value="نمایش" id="filterName" class="btn btn-primary btn-lg btn-block">

            <br />
            <div id="myDiv1"></div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
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
            <div class="mb-3-dh" id="content-tables-index">
            @if (count($files) > 0)
                @foreach ($files as $key=>$file_detail)
                    <div class="mb-3 content-tables" style="position:relative;z-index:2">
                        <div class ="table-img" id="table-img-{{$key}}"
                            style="font-size:15px;direction:rtl;font-family:yekan;z-index:2;
                                background:repeating-linear-gradient(45deg, #97989B 0, #97989B 5%, #ECECED 0, #ECECED 50%) 0 / 10px 10px;                                 
                                border-radius: 0px 0px 16px 16px;
                                padding :20px"
                        >
                        <div style="justify-content: center;display:flex;background-color:#D0D0D1;width:100%;color: rgba(2, 17, 59, 0.76);height:30px;align-items: center;border-radius: 4px 4px 0px 0px;">{{ $description[$key] }}</div>
                            <table cellspacing="0"  class="table card" style="
                                    background: rgba(2, 17, 59, 0.76);
                                    border-radius: 0px 0px 16px 16px;
                                    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                                    border-spacing:0 5px;
                                    table-layout: fixed;
                                    word-wrap: break-word;
                                    border: 1px solid rgba(2, 17, 59, 0.3);
                                    border-collapse: collapse;
                                    padding-bottom: 50px;border-bottom: 0px;">
                                <tbody>
                                @if (count($file_detail) > 0)
                                    @foreach ($file_detail as $key2=> $files)
                                    @if($loop->last)
                                    <tr>
                                    @else                                   
                                    <tr style="border-color: inherit;border-style: solid;border-width: 1px;border-color:#163F90">
                                    @endif

                                    @foreach ($files as $key_row=>$file)
                                    @if($loop->first)
                                    <td style="color:#FFF;
                                                    width:10%;
                                                    padding: 0.5rem 0.5rem;
                                                    background-color: var(--bs-table-bg);
                                                    border: 0px;">
                                    @else 
                                        <td style="color:#FFF;
                                                    width:10%;
                                                    padding: 0.5rem 0.5rem;
                                                    background-color: var(--bs-table-bg);
                                                    border-bottom-width: 0px;
                                                    border-color:#FFF;
                                                    border-right: solid 1px #E0E8FE;
                                                    border-top:0px;
                                                  ;"
                                        >
                                        @endif
                                        <?php
                                        if(!empty($file) ){
                                         echo   to_persian_numbers($file);
                                        }
                                        ?>
                                        
                                    </td>
                                   
                                    @endforeach
                                    </tr>
                                  
                                    @endforeach
                                    @endif
                                    </tbody>
                            </table>
                            <div  style=" display: flex;
  justify-content: center;
  align-items: center;" class="logo text-center" id ="logo">
                           
                            <img src="/uploads/images/logo.svg" width="120" height="60">

                        </div>
                        </div>
                        
                    </div>
                    @endforeach
                    @endif
            </div>
       </div>
       <div class="container canvas-content" style="max-width: 600px">
            <div class="col-md-12 mb-3 text-center" id ="stack">
                @foreach ($files as $key=>$file_detail)
                    <canvas id="canvas-{{$key}}" style="display:none;background:repeating-linear-gradient(45deg, #8D8F92 0, #8D8F92 5%, #F6F6F6 0, #F6F6F6 50%) 0 / 10px 10px;"></canvas>
                @endforeach
            </div>   
       </div>
       <script src="/js/home.js"></script>
        </body>
<script type="application/javascript">
    

</script>
</html>