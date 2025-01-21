import Inputmask from "inputmask";

export const contactMask = () => {
    Inputmask("(99) 99999-9999").mask(
        document.getElementById("patientContact")
    );
};
