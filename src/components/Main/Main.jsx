import React from 'react';
import {Navigate, Route, Routes} from "react-router-dom";
import Home from "../../pages/Home/Home";
import LoginEmail from "../../pages/Auth/Login/Email/Email";
import LoginPhone from "../../pages/Auth/Login/Phone/Phone";
import Advertisement from "../../pages/Advertisement/Advertisement";


const MyComponent = () => {
    return (
        <main>
            <Routes>
                <Route path="/" element={<Home />} />
                <Route team='login' path='/login'>
                    <Route path=':email' element={<LoginEmail />}/>
                    <Route path=':phone' element={<LoginPhone />}/>
                </Route>
                <Route team='advertisement' path='/advertisement'>
                    <Route path=':advertisementId' element={<Advertisement />} />
                </Route>



                <Route path='*' element={<Navigate to="/" replace />} />
            </Routes>
        </main>
    );
};


export default MyComponent;
