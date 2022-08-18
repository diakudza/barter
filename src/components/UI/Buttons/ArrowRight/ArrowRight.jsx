import React from 'react';
import classes from './ArrowRight.module.css';

const ArrowRight = () => {
    return (
        <button className={classes.right}>
            <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.1667 4.81718L1.16669 4.81718" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M7.13348 0.80089L11.1668 4.81689L7.13348 8.83356" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    );
};

export default ArrowRight;
