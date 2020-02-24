<div class="eventor_box">
    <style scoped>
        .eventor_box{
            display: inline-block;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .eventor_field{
            display: contents;
        }
    </style>
    <p class="meta-options eventor_date">
        <label for="eventor_time_set">Event Date</label>
        <input 
            id="eventor_date_set" 
            type="date" 
            name="eventor_date_set"
            style="width: 100%;"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'eventor_date_set', true ) ); ?>">
    </p>
    <p class="meta-options eventor_time">
        <label for="eventor_time_set">Event Time</label>
        <input 
            id="eventor_time_set" 
            type="time" 
            name="eventor_time_set"
            style="width: 100%;"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'eventor_time_set', true ) ); ?>">
    </p>
    <p class="meta-options eventor_location">
        <label for="eventor_location_set">Event Location</label>
        <input 
            id="eventor_location_set" 
            type="text" 
            name="eventor_location_set"
            style="width: 100%;"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'eventor_location_set', true ) ); ?>">
    </p>
</div>