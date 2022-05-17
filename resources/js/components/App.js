import React, {useState} from 'react';

const App = () => {

    [page, setPage] = useState("login");
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>

                        <div className="card-body hidden">I'm an example component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default App;

