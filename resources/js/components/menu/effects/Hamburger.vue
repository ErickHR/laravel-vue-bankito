<template>

    <div :id="id" style="width: 60px; height: 39px; left: 130px; position: relative;">
        <button class="burger">
            <span class="h-top-line"></span>
            <span class="h-middle-line"></span>
            <span class="h-bottom-line"></span>
        </button>
    </div>

</template>

<script>
    export default {
        props:[
            'id',
            'hideClass'
        ],

        methods : {
            burger(){
                let _this = this
                const id_hamburguer = document.querySelector(`#${_this.id}`)
                const nav = document.querySelector(`#${_this.id} button`)
                const menu = document.querySelector(`#menu`)
                const app_menu = document.querySelector(`#${this.hideClass}`)
                nav.addEventListener('click', () => {
                    id_hamburguer.classList.toggle('hide-left')
                    nav.classList.toggle('open')
                    menu.classList.toggle('menu-hide')
                    app_menu.classList.toggle('app-menu-hide')
                    // _this.hide()
                })
            },

            show(){

                // gsap.to(`#menu`, {duration: 0, width:'0vw', backgroundColor:'rgba(255, 255, 255, 0)'});
                // gsap.to(`#${this.hideClass}`, {duration: 1, x:-320});
                // gsap.to(`.burger`, {duration: 1, x:100});

            }

        },

        mounted(){

            this.burger()
            this.show()

        }

    }
</script>


<style>

.burger{
  background:none;
  cursor:pointer;
  border: 1px solid transparent;
  width: 60px;
  height: 39px;
}

.burger span{
  border-radius:5px;
  background: black;
  display:block;
  width:60%;
  height:2px;
  margin:5px auto;
  animation-duration: 1s;
  animation-fill-mode: forwards;
}

.burger.open .h-top-line{
  animation-name: top-line;
}

.burger.open .h-middle-line{
  animation-name: middle-line;
}

.burger.open .h-bottom-line{
  animation-name: bottom-line;
}

.burger .h-top-line{
  animation-name: top-line-close;
}

.burger .h-middle-line{
  animation-name: middle-line-close;
}

.burger .h-bottom-line{
  animation-name: bottom-line-close;
}

.hide-left{
  left:0px !important;
}

@keyframes top-line{
  50%, 100%{
    margin: 0 auto;
    transform: translateY(2px) rotate(-45deg);
  }
}

@keyframes bottom-line{
  50%, 100%{
    margin: 0 auto;
    transform: translateY(-2px) rotate(45deg);
  }
}

@keyframes middle-line{
  50%, 100%{
    margin: 0 auto;
    width:0;
    opacity:0
  }
}


@keyframes top-line-close{
  0%{
    margin: 0 auto;
    transform: translateY(2px) rotate(-45deg);
  }
  50%, 100%{
    margin: 0 auto;
    transform: translateY(0px) rotate(0deg);
  }
}

@keyframes bottom-line-close{
  0%{
    margin: 0 auto;
    transform: translateY(-2px) rotate(45deg);
  }
  50%, 100%{
    margin: 0 auto;
    transform: translateY(0px) rotate(0deg);
  }
}

@keyframes middle-line-close{
  0%{
    margin: 0 auto;
    width:0;
    opacity:0
  }
  50%, 100%{
    margin: 5px auto;
    width:60%;
    opacity:1
  }
}
</style>
