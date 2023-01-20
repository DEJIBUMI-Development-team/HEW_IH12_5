const pickrContainer = document.querySelector('.color-picker');
const themes = [
    [
        'nano',
        {
            swatches: [
                'rgba(0, 0, 0, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 0, 0, 1)',
                'rgba(255, 165, 0, 1)',
                'rgba(255, 255, 0, 1)',
                'rgba(0, 255, 0, 1)',
                'rgba(0, 0, 255, 1)'
            ],

            components: {
                preview: true,  //現在のカラー
                opacity: false, //透明度
                hue: true,      //色相バー

                interaction: {
                    hex: false,
                    rgba: false,
                    hsva: false,
                    input: true,
                    clear: false,
                    save: true
                }
            }
        }
    ]
];

const buttons = [];
let pickr = null;

for (const [theme, config] of themes) {
    const button = document.createElement('button');
    button.innerHTML = theme;
    buttons.push(button);

    button.addEventListener('click', () => {
        const el = document.createElement('p');
        pickrContainer.appendChild(el);

        // Delete previous instance
        if (pickr) {
            pickr.destroyAndRemove();
        }

        // Apply active class
        for (const btn of buttons) {
            btn.classList[btn === button ? 'add' : 'remove']('active');
        }

        // Create fresh instance
        pickr = new Pickr(Object.assign({
            el, theme,
            default: '#000'
        }, config));

        // Set events
        pickr.on('init', instance => {
            console.log('Event: "init"', instance);
        }).on('save', (color) => {
            // debugger;
            G_current_text.css("color", `${color.toHEXA()}`);
        });
    
    });
    
}

buttons[0].click();
