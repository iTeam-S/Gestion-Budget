const Item = ({nom, total}) => {

    return(
        <div className='shadow-md border h-40 rounded m-4 mr-0 last-of-type:mr-4'>
            <div className="text-center m-4">Nom Journal</div>
            <div>Total Journal</div>
            <div className='flex flex-row justify-end last-of-type:mt-auto'>
                <button type='button' className='transition duration-150 ease-in-out hover:bg-teal'>
                    <svg xmlns='http://www.w3.org/2000/svg' className="h-6 w-6" fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                        <path strokeLinecap='round' strokeLinejoin='round' strokeWidth='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z' />
                    </svg>
                </button>
                <button className="transition duration-150 ease-in-out hover:bg-teal">
                    <svg xmlns='http://www.w3.org/2000/svg' className="h-6 w-6" fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                        <path strokeLinecap='round' strokeLinejoin='round' strokeWidth='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'/>
                    </svg>
                </button>
            </div>
        </div>
    )
}

export default Item
