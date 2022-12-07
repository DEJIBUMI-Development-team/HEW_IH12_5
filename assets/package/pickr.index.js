const pickrContainer = document.querySelector('.color-picker');
const themes = [
    [
        'nano',
        {
            swatches: [
                'rgba(255, 255, 255, 1)',
                'rgba(233, 30, 99, 0.95)',
                'rgba(156, 39, 176, 0.9)',
                'rgba(103, 58, 183, 0.85)',
                'rgba(63, 81, 181, 0.8)',
                'rgba(33, 150, 243, 0.75)',
                'rgba(3, 169, 244, 0.7)'
            ],

            components: {
                preview: true,
                opacity: true,
                hue: true,

                interaction: {
                    hex: false,
                    rgba: false,
                    hsva: false,
                    input: true,
                    clear: true,
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
