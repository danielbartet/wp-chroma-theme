<?php 
    $sponsorTitle = get_field('sponsor_title');
    $sponsorDesc = get_field('sponsor_description');
    $sponsorImg = get_field('sponsor_image');
    $sponsorUrl = get_field('sponsor_url');
    $sponsorBtnText = get_field('sponsor_button_text');
?>

<?php $i = 1;
while(have_rows('adhesion_unit_controller', 149119) && get_field('set_adhesion_unit_active')) { 
    the_row();
    $sponsorTitle = get_sub_field('sponsor_title');
    $sponsorDesc = get_sub_field('sponsor_description');
    $sponsorImg = get_sub_field('sponsor_image');
    $sponsorUrl = get_sub_field('sponsor_url');
    $sponsorBtnText = get_sub_field('sponsor_button_text'); 
?>
<div class='adhesionUnitContainer'>
    <img src='<?php echo $sponsorImg; ?>' />
    <div class='adhesionInfo'>
    <h3><?php echo $sponsorTitle; ?></h3>
    <p class='adhesionDesc'><?php echo $sponsorDesc; ?></p>
    </div>
    <?php if($sponsorBtnText): ?>
        <a href='<?php echo $sponsorUrl; ?>'><?php echo $sponsorBtnText; ?></a>
    <?php else: ?>
        <a href='<?php echo $sponsorUrl; ?>'>Learn More</a>
</div>
    <?php endif; break;} ?>

<script>
let adhesion = document.querySelector('.adhesionUnitContainer');
var height = document.documentElement.scrollHeight - 400;
console.log(height);
window.addEventListener('scroll', () => {
    if(window.scrollY === 0) adhesion.style.opacity = 0;
    if(window.scrollY >= height) {
        adhesion.style.opacity = 0;
    } else {
        adhesion.style.opacity = 1;
    }
})
</script>