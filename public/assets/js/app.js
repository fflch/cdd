function show(id) {
    document.getElementById(id).style.display = "flex";
  }

function hide(id) {
    document.getElementById(id).style.display = "none";
}

function disable(id) {
  document.getElementById(id).setAttribute("disabled", "");
}

function enable(id) {
  document.getElementById(id).removeAttribute("disabled");
}

function showEnable(id) {
  show(id);
  enable(id);
}

function hideDisable(id) {
  hide(id);
  disable(id);
}

function select(id) {
  'use strict';
  const options = [
    'input_busca_assunto', 
    'input_busca_cdd',  
    'input_busca_observacao', 
    'input_busca_categoria',
    'input_busca_enviado_para_sibi', 
    'input_busca_normalizado'
  ]; 

  enable(id);
  options.map((item, index) => { if (options[index] != id) {disable(options[index])} });
}

require('./bootstrap');
