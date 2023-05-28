<main class="form-signin w-100">
            <form class="rating__stars" id="rating_form" onmouseenter="disableWindowsOpen();" onmouseleave="enableWindowsOpen();">
                <!--identificare le valutazioni -->
                <input id="rating-1" class="rating__input rating__input-1" type="radio" name="rating" value="1">
                <input id="rating-2" class="rating__input rating__input-2" type="radio" name="rating" value="2">
                <input id="rating-3" class="rating__input rating__input-3" type="radio" name="rating" value="3">
                <input id="rating-4" class="rating__input rating__input-4" type="radio" name="rating" value="4">
                <input id="rating-5" class="rating__input rating__input-5" type="radio" name="rating" value="5">
                
                <?php
                    for($i=1;$i<=5;$i++){
                        echo'
                        <label class="rating__label" for="rating-'.$i.'">
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
                
            </form>
        
        
</main>

<script>
    window.addEventListener("DOMContentLoaded", () => {

            //variabile per animazione
          const starRating= new StarRating("#rating_form");
          
        });

            class StarRating {
                constructor(qs) {
                    this.rating = null;
                    this.el = document.querySelector(qs);   //prende tutto "l'array" stelle
                    this.el?.addEventListener("change", this.updateRating.bind(this)); //fa partire updateRating quando clicchi qualcosa
                }
                
                updateRating(e) {
                    // clear animation delays
                    Array.from(this.el.querySelectorAll('[for*="rating')).forEach(el => {
                        el.className = "rating__label";
                        
                    });
                    
                    const prevRatingID = this.rating || 0;
                    this.rating=parseInt(e.target.value);

                    let delay = 0;
                    for(var i=1;i<=5;i++) {
                        // crea ritardo animazione 
                        const ratingLabel = this.el.querySelector('[for="rating'+'-'+ i+'"]');
                        if (i > prevRatingID + 1 && i <= this.rating) {  
                                                   
                            ++delay;                            
                            ratingLabel.classList.add(`rating__label--delay${delay}`);
                        }
                    }
                }
            }
        </script>

