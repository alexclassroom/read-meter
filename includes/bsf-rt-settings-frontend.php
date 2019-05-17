<div class="bsf_rt_global_settings" id="bsf_rt_global_settings">
  <form action="<?php echo "?page=bsf_rt&tab=bsf_rt_settings_backend"; ?>" method="post" name="bsf_rt_settings_form">
    <table class="form-table" > 
      <tr>
        <h3> General Settings </h3>
      </tr>

      <tr>
        <th scope="row">
          <label for="WordsPerMinute">Words Per Minute :</label>
        </th>
        <td>
          <input type="number" required name="bsf_rt_words_per_minute" placeholder="275" value="<?php $options=get_option('bsf_rt'); echo $options['bsf_rt_words_per_minute'];?>" class="small-text">
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label for="SelectPostTypes">Select Post Types :</label>
        </th>
        <td class="post_type_name">
          <?php
            $args = array(
            'public'   => true,
            '_builtin' => true
            );
            $options=get_option('bsf_rt');

            foreach ( get_post_types($args, 'names') as $post_type ) {
              if ( in_array($post_type, $options['bsf_rt_post_types'])) {
                echo '<input type="checkbox" checked name="posts[]" value="'.$post_type.'"/>' . $post_type.'<br>';
              } else {
                echo '<input type="checkbox"  name="posts[]" value="'.$post_type.'"/>' . $post_type.'<br>';
              }
              
            }
          ?>
          <?php
            $args = array(
            'public'   => true,
            '_builtin' => false
            );
            foreach ( get_post_types($args, 'names') as $post_type ) {
                if ( in_array($post_type, $options['bsf_rt_post_types'])) {
                echo '<input type="checkbox" checked name="posts[]" value="'.$post_type.'"/>' . $post_type.'<br>';
              } else {
                echo '<input type="checkbox"  name="posts[]" value="'.$post_type.'"/>' . $post_type.'<br>';
              }
            }
          ?>
          <p class="description">
            Deafults to Above Post Content , Specify Position   Where Do you want to display the Reading Time
          </p>  
        </td>
      </tr>

    </table>
       
    <table class="form-table" >
      <tr>
        <h3>Read Time</h3>
      </tr>

      <tr>
        <th scope="row">
        <label for="ShowEstimatedReadTime">Show Estimated Read Time On:</label>
        </th>
        <td>
          <label for="ForSinglePage">
            <?php
               if ($options['bsf_rt_single_page']) {
                echo ' <input type="checkbox" checked name="bsf_rt_single_page" value="bsf_rt_single_page">';
              } else {
                echo ' <input type="checkbox" name="bsf_rt_single_page" value="bsf_rt_single_page">';
              }
             ?>
         
          Single Page</label> 
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label for="PositiontoDisplayReadTime">Position to Display Read Time:</label>
        </th>
        <td>
          <select required name="bsf_rt_position_of_read_time">
            <?php 
            if (isset($options['bsf_rt_position_of_read_time'])) {
              if ('above_the_content' === $options['bsf_rt_position_of_read_time']) {
                echo '<option selected value="above_the_content">Above the Content</option>';
              } else {
                  echo '<option  value="above_the_content">Above the Content</option>';
              }
               if ('above_the_post_title' === $options['bsf_rt_position_of_read_time']) {
                echo '<option selected value="above_the_post_title">Above the Post Title</option>';
              } else {
                  echo '<option value="above_the_post_title">Above the Post Title</option>';
              }
               if ('below_the_post_title' === $options['bsf_rt_position_of_read_time']) {
                echo '<option selected value="below_the_post_title">Below the Post Title</option>';
              } else {
                  echo '<option value="below_the_post_title">Below the Post Title</option>';
              }

            } else {
              echo '<option selected value="none">None</option>';
            }

             ?>
            </select>
          <p class="description">
          Deafults to Above Post Content , Specify Position Where Do you want to display the Reading Time
          </p>  
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label for="ReadingTimePostfixLabel">Reading Time PreFix :</label>
        </th>
        <td>
          <input type="text"  name="bsf_rt_reading_time_prefix_label" placeholder="mins" value="<?php echo $options['bsf_rt_reading_time_label'];?>" class="regular-text">
          <p class="description">

          This value will Display before the Reading Time , Keep Blank for mins.

          </p>  
        </td>
      </tr>
      <tr>
        <th scope="row">
         <label for="ReadingTimePrefixLabel">Reading Time PostFix :</label>
        </th>
        <td>
          <input type="text"  name="bsf_rt_reading_time_postfix_label" placeholder="mins" value="<?php echo $options['bsf_rt_reading_time_postfix_label'];?>" class="regular-text">
          <p class="description">                    
          This value will Display after the Reading Time , Keep Blank for mins.
          </p>  
        </td>
      </tr>

    </table>

    <table class="form-table">
      <tr>
        <h3>Progress Bar</h3>
      </tr>

      <tr>
        <th scope="row">
        <label for="PositionofDisplayProgressBar">Display Position:</label>
        </th>
        <td>
          <select required name="bsf_rt_position_of_progress_bar">
            <?php 
            if (isset($options['bsf_rt_position_of_progress_bar'])) {
              if ('top_of_the_page' === $options['bsf_rt_position_of_progress_bar']) {
                echo '<option selected value="top_of_the_page">Top of the Page</option>';
              } else {
                  echo '<option value="top_of_the_page">Top of the Page</option>';
              }
               if ('bottom_of_the_page' === $options['bsf_rt_position_of_progress_bar']) {
                echo '<option selected value="bottom_of_the_page">Bottom of the Page</option>';
              } else {
                  echo '<option value="bottom_of_the_page">Bottom of the Page</option>';
              }

            } else {
              echo '<option selected value="none">None</option>';
            }

             ?>
          </select>
        </td>
      </tr>
         
      <tr>
        <th scope="row">
          <label for="ProgressBarStyle">Styles :</label>
        </th>
          <td>
            <select  name="bsf_rt_progress_bar_styles" id="getFname" onchange="bsd_rt_ColorSelectCheck(this);">
               <?php 
            if (isset($options['bsf_rt_progress_bar_styles'])) {
              if ('Normal' === $options['bsf_rt_progress_bar_styles']) {
                echo '<option selected value="Normal">Normal</option>';
              } else {
                  echo '<option  value="Normal">Normal</option>';
              }
               if ('Gradient' === $options['bsf_rt_progress_bar_styles']) {
                echo '<option selected id="gradiantcolor" value="Gradient">Gradient</option>';
              } else {
                  echo '<option id="gradiantcolor" value="Gradient">Gradient</option>';
              }

            } else {
              echo '<option selected value="Normal">Normal</option>';
            }

             ?>
                
                
             </select>
          </td>
        </tr>
          
        <tr id="normal-color-wrap">
          <th scope="row">
            <label for="ProgressBarColor">Color :</label>
          </th>  
          <td>
            <?php
             if (isset($options['bsf_rt_progress_bar_color'])) { ?>
              <input name="bsf_rt_progress_bar_color" class="my-color-field" value="<?php echo $options['bsf_rt_progress_bar_color']; ?>">
             <?php } else { ?>
              <input name="bsf_rt_progress_bar_color" class="my-color-field" value="#00ACE0">
             <?php }
            ?>
           
          </td>
        </tr>
          
        <tr id="normal-back-wrap">
          <th scope="row">
            <label for="ProgressBarBackgroundColor">Background Color :</label>
          </th>
          <td>
             <?php
             if (isset($options['bsf_rt_progress_bar_background_color'])) { ?>
              <input name="bsf_rt_progress_bar_background_color" class="my-color-field" value=" <?php echo $options['bsf_rt_progress_bar_background_color']; ?>">
             <?php } else { ?>
               <input name="bsf_rt_progress_bar_background_color" class="my-color-field" value="#E00078">
             <?php }
            ?>
            
          </td>
        </tr>
        <tr id="gradiant-wrap1">
          <th scope="row">
            <label for="ProgressBarColor">Primary Color :</label>
          </th>
          <td>
             <?php
             if (isset($options['bsf_rt_progress_bar_color_g1'])) { ?>
              <input name="bsf_rt_progress_bar_color_g1" class="my-color-field" value="<?php echo $options['bsf_rt_progress_bar_color_g1']; ?>">
             <?php } else { ?>
               <input name="bsf_rt_progress_bar_color_g1" class="my-color-field" value="#E00078">
             <?php }
            ?>
          
          </td>
        </tr>

        <tr id="gradiant-wrap2">
            <th scope="row">
              <label for="ProgressBarColor">Secondary Color :</label>
            </th>
            <td>
               <?php
             if (isset($options['bsf_rt_progress_bar_color_g2'])) { ?>
              <input name="bsf_rt_progress_bar_color_g2" class="my-color-field" value="<?php echo $options['bsf_rt_progress_bar_color_g2']; ?>">
             <?php } else { ?>
               <input name="bsf_rt_progress_bar_color_g2" class="my-color-field" value="#E00078">
             <?php }
            ?>
             
            </td>
        </tr>

        <tr>
          <th scope="row">
            <label for="Thickness">Thickness :</label>
          </th>
          <td>
             <?php
             
             if (isset($options['bsf_rt_progress_bar_thickness'])) { ?>
              <input type="number" name="bsf_rt_progress_bar_thickness" class="small-text" value="<?php echo $options['bsf_rt_progress_bar_thickness']; ?>">&nbsppx
             <?php } else { ?>
               <input type="number" name="bsf_rt_progress_bar_thickness" class="small-text" value="10">&nbsppx
             <?php }
            ?>
           
          </td>
        </tr>
        <tr>
          <th>
          <input type="submit" value="Save" class="bt button button-primary" name="submit">
          </th>
       </tr>
    </table>
  </form>
</div>
