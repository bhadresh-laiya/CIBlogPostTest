<h2><?php echo $title; ?></h2>
 
<?php echo validation_errors(); ?>
 
<?php echo form_open_multipart('blog/create'); ?>    
 
    <table class="table">        
        <tr>
            <td><label for="title">Title</label></td>
            <td><input type="input" class="form-control" name="title" size="50" /></td>
        </tr>
        <tr>
            <td><label for="title">Select Categories</label></td>
            <td>
                <select multiple="" name="categories[]" class="form-control">
                    <?php foreach ($category_item as $category): ?>
                        <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="text">Text</label></td>
            <td><textarea name="text" class="form-control" rows="10" cols="40"></textarea></td>
        </tr>        
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Create blog item" class="btn btn-info" /></td>
        </tr>
    </table>
    
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />    
</form>