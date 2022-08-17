import React from 'react';
import classes from './ArrowLeft.module.css';

const ArrowLeft = () => {
    return (
        <button className={classes.left}>
            <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.833313 5.18282L10.8333 5.18282" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M4.86652 9.19911L0.833182 5.18311L4.86652 1.16644" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    );
};

export default ArrowLeft;
