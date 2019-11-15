<h2><?php echo $title; ?></h2>

<?php if(count($blog) > 0) {?>
<table border='1' cellpadding='4' class="table">
    <tr>
        <td><strong>Title</strong></td>
        <td><strong>Content</strong></td>
        <td><strong>Action</strong></td>
    </tr>
<?php foreach ($blog as $blog_item): ?>
        <tr>
            <td><?php echo $blog_item['title']; ?></td>
            <td><?php echo $blog_item['description']; ?></td>
            <td>
                <a href="<?php echo site_url('blog/'.$blog_item['slug']); ?>">View</a> 
                
                <?php if ($this->session->userdata('is_logged_in')) { ?>
                | 
                <a href="<?php echo site_url('blog/edit/'.$blog_item['id']); ?>">Edit</a> | 
                <a href="<?php echo site_url('blog/delete/'.$blog_item['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                <?php } // end if ?>
                
            </td>
        </tr>
<?php endforeach; ?>
</table>
<?php } else { ?>
    <div>No blog(s) found. <a href="<?php echo site_url('blog/create'); ?>">Click</a> to add new blog.</div>
<?php } ?>