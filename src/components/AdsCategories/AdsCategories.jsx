import React from 'react';
import classes from './AdsCategories.module.css';
import ArrowLeft from "../UI/Buttons/ArrowLeft/ArrowLeft";
import ArrowRight from "../UI/Buttons/ArrowRight/ArrowRight";
import AdCategory from "../AdCategory/AdCategory";

const AdsCategories = ({heading, ads}) => {
    return (
        <div className={classes.ads}>
            <div className={classes.up}>
                <h3 className={classes.heading}>{heading}</h3>
                <div className={classes.buttons}>
                    <ArrowLeft />
                    <ArrowRight />
                </div>
            </div>
            <div className={classes.down}>
                {
                    ads.map((ad) => <AdCategory ad={ad} key={ad.ad_id}/>)
                }
            </div>
        </div>
    );
};

export default AdsCategories;
