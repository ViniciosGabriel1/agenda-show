
import { cpfMask } from './cpfMask';  // Exemplo de máscara adicional
import { contactMask } from './contactMask';

export const applyScheduleMasks = () => {
  cpfMask();  // Chama a máscara de CPF
  contactMask();
};
