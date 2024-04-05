const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    
    theme: {
       
        fontFamily: {
            'sans' : ['Sailec', 'sans-serif'],
        },  
        container: {
            padding: {
                DEFAULT:  '40px',
                lg:       '80px',
            },
            center: true,
        },
        extend: {
            colors: {
              'ghost-white' : '#F7F7FB',
              'space-cadet' : '#242140',
              'turquoise' : '#45E8C9',
              'blue-jeans' : '#36A6FF',
              'purple' : '#8A4FFF',
            },
            backgroundImage: {
                'buttonGradient': 'linear-gradient(90deg, #46E9C9 -4.47%, #2EB7F3 33.7%, #8A4FFF 103.42%)',
                'textGradient' : 'linear-gradient(90deg, #46E9C9 4.89%, #2EB7F3 20.69%, #8A4FFF 35.78%)',
                'counterGradient' : 'linear-gradient(90deg, #46E9C9 0%, #2EB7F3 50%, #8A4FFF 100%)',
                'navGradient' : 'linear-gradient(91deg, #46E9C9 -11.87%, #2EB7F3 20.54%, #8A4FFF 88.34%)',
                'videoGradient' : 'linear-gradient(0deg, rgba(36, 33, 64, 0.60) 0%, rgba(36, 33, 64, 0.60) 100%)',
              },
            
        },
       
      },

}