import React from 'react';
import {Route, Routes} from "react-router-dom";
import Home from "../../pages/Home/Home";
import LoginEmail from "../../pages/Auth/Login/Email/Email";
import LoginPhone from "../../pages/Auth/Login/Phone/Phone";


const MyComponent = () => {
    return (
        <main>
            <Routes>
                <Route path="/" element={<Home />} />
                <Route team='login' path='/login'>
                    <Route path='/login/email' element={<LoginEmail />}/>
                    <Route path='/login/phone' element={<LoginPhone />}/>
                </Route>
            </Routes>
        </main>
    );
};

export default MyComponent;
