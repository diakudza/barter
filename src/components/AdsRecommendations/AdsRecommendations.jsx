import React from 'react';
import classes from './AdsRecommendations.module.css';
import AdsRecommendation from "../AdsRecommendation/AdsRecommendation";

const AdsRecommendations = ({heading,ads}) => {
    return (
        <div className={classes.ads}>
            <div className={classes.up}>
                <h3 className={classes.heading}>{heading}</h3>
            </div>
            <div className={classes.down}>
                {
                    ads.map((ad) => <AdsRecommendation ad={ad} key={ad.ad_id}/>)
                }
            </div>
            <button className={classes.more}>
                Смотреть все
                <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.6667 4.81706L0.666687 4.81706" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.63348 0.800829L10.6668 4.81683L6.63348 8.8335" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    );
};

export default AdsRecommendations;
