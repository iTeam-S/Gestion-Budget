import Anime from 'react-anime';

const AddItem = ({type}) => {

    return(
        <div className='bg-teal flex items-center justify-center shadow-md h-40 rounded m-4 mr-0'>
            <Anime
            easing='easeOutElastic(1, .4)'
            loop={true}
            duration={1000}
            scale={2}>
                <svg xmlns="http://www.w3.org/2000/svg" className="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </Anime>
        </div>
    )
}

export default AddItem
