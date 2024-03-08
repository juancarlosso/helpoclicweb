{{-- <!DOCTYPE html>
<html>
<body>
<div id="adobe-dc-view"></div>
<script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
<script type="text/javascript">
 document.addEventListener("adobe_dc_view_sdk.ready", function(){
  var adobeDCView = new AdobeDC.View({clientId: "0166027b7043407abadbbdf626b0a8a7", divId: "adobe-dc-view"});
  adobeDCView.previewFile({
   content:{location: {url: "{{$archivo}}"}},
   metaData:{fileName: "{{$archivo}}"}
  }, {defaultViewMode: "FIT_WIDTH"});
 });
</script>
</body>
</html> --}}
<!DOCTYPE html>
<html>
<head>
 <title>PDF</title>
 <meta charset="utf-8"/>
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
 <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body style="margin: 0px">
 <div id="adobe-dc-view"></div>
 <script src="https://documentservices.adobe.com/view-sdk/viewer.js"></script>
 <script type="text/javascript">
    document.addEventListener("adobe_dc_view_sdk.ready", function()
    {
        var adobeDCView = new AdobeDC.View({clientId: "0166027b7043407abadbbdf626b0a8a7", divId: "adobe-dc-view"});
        adobeDCView.previewFile({
         content:{location: {url: "{{$archivo}}"}},
         metaData:{fileName: "{{$archivo}}"}
        }, {defaultViewMode: "FIT_WIDTH"});
    });
 </script>
</body>
</html>
