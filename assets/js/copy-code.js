document.addEventListener('DOMContentLoaded', () => {
  const codeBlocks = document.querySelectorAll('.directory-tree');

  codeBlocks.forEach((codeBlock) => {
    // ラッパーを作成
    const wrapper = document.createElement('div');
    wrapper.classList.add('directory-tree-wrapper');

    codeBlock.parentNode.insertBefore(wrapper, codeBlock);
    wrapper.appendChild(codeBlock);

    // コピーボタンを作成
    const copyButton = document.createElement('button');

    copyButton.type = 'button';
    copyButton.classList.add('directory-tree-copy');
    copyButton.textContent = 'コピー';

    wrapper.appendChild(copyButton);

    // コピー処理
    copyButton.addEventListener('click', async () => {
      const text = codeBlock.textContent;

      try {
        await navigator.clipboard.writeText(text);

        copyButton.textContent = 'コピーしました';

        setTimeout(() => {
          copyButton.textContent = 'コピー';
        }, 2000);
      } catch (error) {
        console.error('コピーに失敗しました:', error);
      }
    });
  });
});