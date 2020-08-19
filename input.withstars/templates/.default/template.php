<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div id="vue-application-input-with-stars"></div>
<script>
    let app = new Vue({
        el:"#vue-application-input-with-stars",
        data:{
            scale:5,
            hoveredRating:5,
            rating:5,
            titles:[
                'Плохо',
                'Удовлетворительно',
                'Нормально',
                'Хорошо',
                'Отлично',
            ]
        },
        methods:{
            changeRatingValue:function(index){
                this.hoveredRating = index + 1;
            },
            compareWithRating:function(){
                this.hoveredRating = this.rating;
            },
            chooseRating:function(index){
                this.rating = index + 1;
            }
        },
        template:"<div @mouseleave='compareWithRating' class='rating'>" +
        "<label class='stars-label'>Оцените нашу работу</label>" +
        "<div class='rating__stars'>" +
        "<span v-for='(star,index) in scale' :title='titles[index]' :class='{active: index < hoveredRating}' @click='chooseRating(index)' @mouseover='changeRatingValue(index)'></span>" +
        "</div>" +
        "<input type='text' name='rating__stars' v-model='rating' />" +
        "</div>"
    });
</script>
<style>
    .rating__stars span.active{
        background-image:url('<?= $templateFolder . "/images/active_star.png"?>');
    }
    .rating__stars span{
        background-image:url('<?= $templateFolder. "/images/non_active_star.png"?>');
    }
</style>
