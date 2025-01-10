const adminSwapButton = document.getElementById('adminSwap');
const staffSwapButton = document.getElementById('staffSwap');
const container = document.getElementById('container');

staffSwapButton.addEventListener('click', () =>
    container.classList.add('right-panel-active')
);

adminSwapButton.addEventListener('click', () =>
    container.classList.remove('right-panel-active')
);
