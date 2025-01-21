import Inputmask from 'inputmask';

export const cpfMask = () => {
  Inputmask("999.999.999-99").mask(document.getElementById("patientDocument"));
};
