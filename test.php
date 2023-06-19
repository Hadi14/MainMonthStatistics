<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?
    require_once('./Config/config.php');
    require_once('./Config/db.php');
    require_once('./Config/common.php');
    $db = new Db();
    $result = $db->doquery("select * from hemayat");
    dump($result);

    ?>
</body>

</html>