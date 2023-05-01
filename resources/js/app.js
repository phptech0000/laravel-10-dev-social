import Dropzone from "dropzone";

Dropzone.autoDiscover=false;

const dropzone= new Dropzone('#dropzone',{
    dictDefaultMessage: 'Upload your picture here',
    acceptedFiles: '.png, .jpg, .jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Remove file',
    maxFiles: 1,
    uploadMultiple: false,
})
