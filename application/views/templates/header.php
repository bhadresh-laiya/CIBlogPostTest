<html>
<head>
    <title>Blog Post Test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-body">
    
        <h1>Blog Post</h1>
        <p>
            <?php if ($this->session->userdata('is_logged_in')) { 
                    echo '<b>Logged in as:</b> ' . $this->session->userdata('email');
                    echo ' | ' . "<a href=" . site_url('blog') . ">Blog</a> | ";
                    echo ' | ' . "<a href=" . site_url('blog/create') . ">Add Blog</a> | ";
                    echo ' | ' . "<a href=" . site_url('user/logout') . ">Logout</a>";
                } else {
            ?>    
                <a href="<?php echo site_url('user/register'); ?>">Register</a> | 
                <a href="<?php echo site_url('user/login'); ?>">Login</a>
            <?php } ?>    
        </p>