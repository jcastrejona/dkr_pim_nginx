<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Example</title>
</head>

<body>

<style type="text/css">
    body {
        padding:0;
        margin: 0;
        font-family: "Lucida Sans Unicode", Arial;
        font-size: 14px;
    }

    #site {
        margin: 0 auto;
        width: 900px;
        padding: 30px 0 0 0;
        color:#65615E;
    }

    h1, h2, h3 {
        font-size: 18px;
        padding: 0 0 5px 0;
        border-bottom: 1px solid #001428;
        margin-bottom: 5px;
    }

    h3 {
        font-size: 14px;
        padding: 15px 0 5px 0;
        margin-bottom: 5px;
        border-color: #cccccc;
    }

    img {
        border: 0;
    }

    p {
        padding: 0 0 5px 0;
    }

    a {
        color: #000;
    }

    #logo {
        text-align: center;
        padding: 50px 0;
    }

    #logo hr {
        display: block;
        height: 1px;
        overflow: hidden;
        background: #BBB;
        border: 0;
        padding:0;
        margin:30px 0 20px 0;
    }

    .claim {
        text-transform: uppercase;
        color:#BBB;
    }

    #site ul {
        padding: 10px 0 10px 20px;
        list-style: circle;
    }

    .buttons {
        margin-bottom: 100px;
        text-align: center;
    }

    .buttons a {
        display: inline-block;
        background: #6428b4;
        color:#fff;
        padding: 5px 10px;
        margin-right: 10px;
        width:40%;
        border-radius: 2px;
        text-decoration: none;
    }

    .buttons a:hover {
        background: #1C8BC1;
    }

    .buttons a:last-child {
        margin: 0;
    }

</style>


<div id="site">
    <div id="logo">
        <a href="http://www.pimcore.com/"><img src="https://static.wixstatic.com/media/bbde28_d383bccf1e76453ab1bef6a1a77f5416~mv2.png/v1/fill/w_280,h_144,al_c,q_85,usm_0.66_1.00_0.01/Softtek.webp" style="width: 190px;" /></a>
        <hr />
    </div>
    <section id="marked-content">
    <?= $this->wysiwyg("specialContent", [
        "height" => 200
    ]); ?>
    </section>

    <?=
    $device = \Pimcore\Tool\DeviceDetector::getInstance();
    $device->getDevice(); // returns "phone", "tablet" or "desktop"

    if($device->isDesktop() || $device->isTablet()) {
        echo "<script language='javascript'>alert('This is not a phone!');</script>";
        echo "<h1>Adaptative design helper works!<h1>";
    }
    ?>
    
    <?=
        
        $text = 'Thank you for the order of "%DataObject(object_id,{"method" : "getName"});"';
        echo '<br>';
        $placeholder = new \Pimcore\Placeholder();
         
        echo $replaced = $placeholder->replacePlaceholders($text, ['object_id' => 2]);
        echo '<br>';
        echo '<br>';
    ?>

    <?= 
            
             $text = 'Hello %Text(firstName); %Text(lastName);!';
             echo '<br>';
             $placeholder = new \Pimcore\Placeholder();
         
             $params = ['firstName' => 'Bart', 'lastName' => 'Simpson'];
         
             $replaced = $placeholder->replacePlaceholders($text, $params);
             echo $replaced; //Will be: Hello Bart Simpson!
    ?>

    



</div>

</body>
</html>
