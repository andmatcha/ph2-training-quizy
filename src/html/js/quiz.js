'use strict';

const clickFn = (questionIndex, choiceIndex, isValid) => {
    const clickedChoice = document.getElementById(`choice${questionIndex}_${choiceIndex}`);
    const validChoice = document.getElementById(`choice${questionIndex}_0`);
    const commentTitle = document.getElementById(`comment_title${questionIndex}`);
    const commentText = document.getElementById(`comment_text${questionIndex}`);

    commentText.innerText = `正解は${validChoice.innerText}です。`
    if (isValid) {
        commentTitle.innerText = '正解！';
    } else {
        commentTitle.innerText = '不正解！';
    }
}
