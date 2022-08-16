import React from 'react';
import classes from './AdCategory.module.css';

const AdCategory = ({ad}) => {
    return (
        <div className={classes.category}>
            <div className={classes.image}><img src={'./images/advertisement/categories/'+ad.ad_img} alt={ad.ad_title} /></div>
            <h3 className={classes.title}>{ad.ad_title}</h3>
            <p className={classes.desc}>{ad.ad_desc}</p>
            <div className={classes.badge}>
                <p>{ad.ad_badge}</p>
            </div>
        </div>
    );
};

export default AdCategory;
