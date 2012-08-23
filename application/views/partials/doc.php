<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:w="urn:schemas-microsoft-com:office:word"
xmlns:m="http://schemas.microsoft.com/office/2004/12/omml"
xmlns="http://www.w3.org/TR/REC-html40">
<head>
  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
  <meta name=Title content="<?= $sow->title ?>">
  <meta name=Keywords content="">
  <meta http-equiv=Content-Type content="text/html; charset=utf-8">
  <meta name=ProgId content=Word.Document>
  <meta name=Generator content="Microsoft Word 2008">
  <meta name=Originator content="Microsoft Word 2008">

  <style>
  body {
    font-family: "Lucida Grande", sans-serif;
  }
  </style>
<!--[if gte mso 9]><xml>
 <w:WordDocument>
  <w:View>Print</w:View>
 </w:WordDocument>
</xml><![endif]-->

</head>
<body>
<h1><?= $sow->title ?></h1>

<?= $sow->body ?>

<br /><br />
<small><?= Config::get('sowcomposer.disclaimer') ?>

</body>
</html>