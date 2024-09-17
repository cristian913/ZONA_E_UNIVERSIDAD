document.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('.faq-item');

    items.forEach(item => {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        const button = item.querySelector('.toggle-btn');

        question.addEventListener('click', function() {
            const isVisible = answer.style.display === 'block';

            // Hide all answers
            items.forEach(i => {
                i.querySelector('.faq-answer').style.display = 'none';
                i.querySelector('.toggle-btn').textContent = '▼';
            });

            // Show or hide the clicked one
            answer.style.display = isVisible ? 'none' : 'block';
            button.textContent = isVisible ? '▼' : '▲';
        });
    });
});