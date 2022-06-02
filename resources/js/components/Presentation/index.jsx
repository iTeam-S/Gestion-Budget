function Presentation({title, subtitle, picture, pictureAlt}){
    return(
        <div className="inline-grid grid-cols-2 gap-4">
            <img src={picture} alt={pictureAlt} />
            <div>
                <h1>{title}</h1>
                <p>{subtitle}</p>
            </div>
        </div>
    )
}

export default Presentation();