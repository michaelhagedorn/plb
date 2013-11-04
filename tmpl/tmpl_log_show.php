<?php

    // dieses Template erwartet ein Array in denen die Logs die angezeigt 
    // werden sollen enthalten sind --> 
    // 
    // $aLogs

?>

<div class="tmpl_log_show_application" id="tmpl_log_show_application">
    LOGWATCH
    <table class="tmpl_log_show_table" border="1">
        <tr class="tmpl_log_show_table_head">
            <td> <?php echo L_N_FACILITY; ?>:</td>
            <td> <?php echo L_N_PRIORITY; ?>:</td>
            <td> <?php echo L_N_TIME; ?>:</td>
            <td> <?php echo L_N_USER; ?>:</td>
            <td> <?php echo L_N_MESSAGE; ?>:</td>            
        </tr>
        <?php        
            foreach ($aLogs as $log) {
        ?>            
       

                <tr class="tmpl_log_show_table_data">             
                    <td> <?php echo $log['facility']; ?></td>
                    <td> <?php echo $log['priority']; ?></td>
                    <td> <?php echo date('H:i:s', $log['time']); ?></td>
                    <td> <?php echo $log['user']; ?></td>
                    <td class="tmpl_log_show_table_data_left"> <a href="?facility=<?php echo $log['facility']; ?>"><?php echo $log['message']; ?></a></td>
                </tr>
        <?php      
            }
        ?>
    </table>
</div>

