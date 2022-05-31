import React, { useEffect, useState} from "react";
import { useDropzone} from "react-dropzone";


function DragAndDrop({}){

    const [files, setFiles] = useState([]);
    const {getRootProps, getInputProps} = useDropzone({
        accept: "image/*",
        onDrop: acceptedFiles => {
            setFiles(acceptedFiles.map(file => Object.assign(file, {
                preview: URL.createObjectURL(file)
            })));
        }
    });


    const thumbs = files.map(file => (
        <div style={thumb} key={file.name}>
            <div style={thumbInner}>
                <img src={file.preview} style={img} />
            </div>
        </div>
    ))

    useEffect(() => {

        files.forEach(file => {

            return(
                URL.revokeObjectURL(file.preview)
            )
            
        }, [files]);
    })

    return(
        <section className="container">
            <div { ...getRootProps({className: "dropzone"})}>
                <input {...getInputProps()} />
                <p>Drap 'n' drop some files here, or click to select files</p>
            </div>
            <aside>
            
            </aside>
        </section>
    );
}

export default DragAndDrop