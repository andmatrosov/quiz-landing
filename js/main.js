document.addEventListener('DOMContentLoaded', function(){
    const startScreen = document.querySelector('.start');
    const quizScreen = document.querySelector('.quiz-wrapper');

    startScreen.querySelector('.quiz-start-btn').addEventListener('click', () => {
        startScreen.style.display = 'none';
        quizScreen.style.display = 'block';
    })

    const swiper = new Swiper('.swiper', {
        allowTouchMove: false,
        pagination: {
            el: '.swiper-pagination',
            renderBullet: (index, className) => {
                return `<span class="${className}">
                            <svg>
                                <use xlink:href="img/sprite.svg#check"></use>
                            </svg>
                        </span>`
            }
        },
        navigation: {
          nextEl: '.quiz-next-btn'
        },
        on: {
            init(swiper){
                swiper.navigation.nextEl.disabled = true;
                swiper.pagination.el.style = `--pagination-connector-width: ${parseInt(getPaginationBulletSpacing(swiper))}px`;
            },
            resize(swiper) {
                swiper.pagination.el.style = `--pagination-connector-width: ${parseInt(getPaginationBulletSpacing(swiper))}px`;
            },
            slideChangeTransitionStart(swiper) {
                const currentSlideEl = swiper.slides[swiper.activeIndex];
                const textareaEl = currentSlideEl.querySelector('textarea');
                if(currentSlideEl.querySelector('input[type=radio]:checked') === null || textareaEl.value.length < 12) {
                    swiper.navigation.nextEl.disabled = true

                    if(textareaEl) {
                        currentSlideEl.querySelector('textarea').addEventListener('input', (e) => {
                            const target = e.target;
                            if(target.value.length >= 12) {
                                swiper.navigation.nextEl.disabled = false
                            } else {
                                swiper.navigation.nextEl.disabled = true
                            }
                        })
                    }
                }

                if(swiper.activeIndex === swiper.slides.length - 1) {
                    console.log('Final')
                    swiper.navigation.nextEl.innerText = "Get Bonuses";
                    swiper.navigation.nextEl.classList.add('final');
                    swiper.navigation.nextEl.addEventListener('click', async () => {
                        await sendAnswer(swiper.slides[swiper.activeIndex ]).then(() => {
                            window.location = 'thanks.php';
                        });
                    })
                }

                const prevSlide = swiper.slides[swiper.activeIndex - 1];

                sendAnswer(prevSlide)
            }
        }
    })

    function getPaginationBulletSpacing(swiper) {
        const bullets = swiper.pagination.bullets;

        if (!bullets || bullets.length < 2) return 0;

        const first = bullets[0].getBoundingClientRect();
        const second = bullets[1].getBoundingClientRect();

        // Расстояние между центрами
        const spacing = Math.abs(second.left + second.width / 2 - (first.left + first.width / 2));

        return spacing;
    }


    const inputs = document.querySelectorAll('input[type=radio]');
    if(inputs.length) {
        inputs.forEach(input => {
            const inputLabel = input.closest('label');
            inputLabel.classList.remove('checked');

            input.addEventListener('change', (e) => {
                clearInputs();
                inputLabel.classList.add('checked');
                swiper.navigation.nextEl.disabled = false
            })
        })
    }

    function getCookie(name) {
        let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        return match ? match[2] : null;
    }

    function setCookie(name, value, days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        let expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }
    async function sendAnswer(slide) {
        const input = slide.querySelector('input[type=radio]:checked') ?? slide.querySelector('textarea');
        if(input) {
            return fetch('write.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: new URLSearchParams({
                    session_id: getCookie('PHPSESSID'),     // Уникальный идентификатор опроса
                    answer: input.value.trim(),
                    question: input.name
                })
            })
        }
    }

    function clearInputs() {
        const inputs = document.querySelectorAll('input[type=radio]');
        if(inputs.length) {
            inputs.forEach(input => {
                const inputLabel = input.closest('label');
                if(!input.checked) {
                    inputLabel.classList.remove('checked');
                }
            })
        }

    }
})