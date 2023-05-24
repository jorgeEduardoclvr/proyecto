// obtenemos la lista de letras del menú
const letters = document.querySelectorAll('.letters li a');

// para cada letra, añadimos un evento "click"
letters.forEach(letter => {
  letter.addEventListener('click', e => {
    // prevenimos el comportamiento por defecto del enlace
    e.preventDefault();

    // obtenemos la letra seleccionada
    const selectedLetter = e.target.dataset.letter;

    // obtenemos todas las secciones de artículos
    const articleSections = document.querySelectorAll('.letter-section');

    // ocultamos todas las secciones de artículos
    articleSections.forEach(section => {
      section.classList.remove('active');
    });

    // mostramos la sección correspondiente a la letra seleccionada
    const selectedSection = document.querySelector(`#${selectedLetter}`);
    selectedSection.classList.add('active');

    // hacemos que la letra seleccionada se vea resaltada
    letters.forEach(letter => {
      letter.classList.remove('active');
    });
    e.target.classList.add('active');
  });
});
