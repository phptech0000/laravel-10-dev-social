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

dropzone.on("sending",function(file, xhr,formData){
    console.log(formData);
})

dropzone.on("success",function(file, response){
    console.log(response);
})

dropzone.on("error",function(file,message){
    console.log(message)
})

dropzone.on("removedfile",function(){
    console.log("file removed");
})