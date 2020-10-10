<?php 
    # Spawn session cookie if one does not exist and set authentication status to false
    session_start();
    if (!(array_key_exists('authenticated', $_SESSION))) $_SESSION['authenticated'] = false;

    # If the user isn't authenticated then redirect them to main
    // if (!$_SESSION['authenticated']) header('location: index.php');

    include_once("assets/includes/head.php");
?>
</head>
<body onresize="repositionFooter()">
    <?php include_once("assets/includes/header.php"); ?>
    <main>
        <?php echo('<h1>Welcome ' . $_SESSION['rcsid'] . '!</h1>'); ?>
        <section class="container">
            
        </section>
    </main>

    <?php
        include_once("assets/includes/footer.php");
        include_once("assets/includes/foot.php");
?>