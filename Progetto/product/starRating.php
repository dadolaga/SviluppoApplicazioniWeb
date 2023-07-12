<div class="form-signin rating__stars " style="width: 230px; position:absolute; right:5px;" id="rating_form_<?php echo $row['Id'];?>" 
        onmouseenter="disableWindowsOpen();" onmouseleave="enableWindowsOpen();">

    <!--identificare le valutazioni -->
    <input id="rating_<?php echo $row['Id'];?>-1" class="rating__input rating__input-1" type="radio" name="rating" value="1"required 
    <?php if($rating_value==1) echo ("checked");
    if($rating_value!=0) echo (" disabled")?>>
    <input id="rating_<?php echo $row['Id'];?>-2" class="rating__input rating__input-2" type="radio" name="rating" value="2"
    <?php if($rating_value==2 ) echo ("checked");
    if($rating_value!=0) echo (" disabled")?>>
    <input id="rating_<?php echo $row['Id'];?>-3" class="rating__input rating__input-3" type="radio" name="rating" value="3"
    <?php if($rating_value==3 ) echo ("checked");
    if($rating_value!=0) echo (" disabled")?>>
    <input id="rating_<?php echo $row['Id'];?>-4" class="rating__input rating__input-4" type="radio" name="rating" value="4"
    <?php if($rating_value==4) echo ("checked");
    if($rating_value!=0) echo (" disabled")?>>
    <input id="rating_<?php echo $row['Id'];?>-5" class="rating__input rating__input-5" type="radio" name="rating" value="5"
    <?php if($rating_value==5 ) echo ("checked");
    if($rating_value!=0) echo (" disabled")?>>
    
    <?php
        for($i=1;$i<=5;$i++){
            echo'
            <label class="rating__label" for="rating_'.$row['Id'].'-'.$i.'">
                <!--per creare oggetti -->
                <svg class="rating__star" width="32" height="32" viewBox="0 0 32 32" aria-hidden="true">
                    <!--crea contorno stella -->
                    <g stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <g transform="translate(16,16) rotate(180)">
                            <!--stella non cliccata -->
                            <polygon class="rating__star-stroke" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="none" />
                            <!--stella cliccata -->
                            <polygon class="rating__star-fill" points="0,15 4.41,6.07 14.27,4.64 7.13,-2.32 8.82,-12.14 0,-7.5 -8.82,-12.14 -7.13,-2.32 -14.27,4.64 -4.41,6.07" fill="#000" />
                        </g>  
                    </g>
                </svg>
            </label>';
        }
    ?>
</div>

