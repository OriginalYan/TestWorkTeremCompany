window.onload = function () {
    let btn1 = document.querySelector('.btn.btn-warning'),
        headline = document.querySelector('h1.headline'),
        btn2 = document.querySelector('.btn.btn-success'),
        flagReplaceBlock = false;

    btn1.onclick = function () {
        (headline.classList.contains('disactive'))? headline.classList.remove('disactive'): headline.classList.add('disactive');
    };

    btn2.onclick = function () {
        let blockRed = document.querySelector('.block__red'),
            blockGreen = document.querySelector('.block__green'),
            blockWrapper__1 = document.querySelector('.block-wrapper-1'),
            blockWrapper__2 = document.querySelector('.block-wrapper-2'),
            blockClear = '';

        if (flagReplaceBlock){
            blockClear = blockGreen;

            blockGreen.replaceWith(blockRed);
            blockWrapper__2.append(blockClear);
            flagReplaceBlock = false;
        } else {
            blockClear = blockRed;

            blockRed.replaceWith(blockGreen);
            blockWrapper__2.append(blockClear);
            flagReplaceBlock = true;
        }
    };
};